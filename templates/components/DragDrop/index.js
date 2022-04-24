import clone from 'clone';

const elementOverlappingTarget = ({
    element,
    target
}) => {
    if (!element || !target) return false;
    const {
        top: draggingTop,
        left: draggingLeft,
        right: draggingRight,
        bottom: draggingBottom,
    } = element.getBoundingClientRect();
    const {
        top: boxTop,
        left: boxLeft,
        right: boxRight,
        bottom: boxBottom
    } = target.getBoundingClientRect();
    return !(
        draggingTop > boxBottom ||
        draggingRight < boxLeft ||
        draggingBottom < boxTop ||
        draggingLeft > boxRight
    );
}

// Check if an element is overlapping an array of target ids
const elementOverlappingTargetInTargets = ({
    element,
    ids
}) => {
    return ids.find(id => elementOverlappingTarget({
        element,
        target: document.querySelector(`#${id}`)
    }));
}

const draggableItemsList = [
    {
        id: 'draggable-cat',
        title: 'Cat'
    },
    {
        id: 'draggable-dog',
        title: 'Dog'
    },
    {
        id: 'draggable-fish',
        title: 'Fish'
    }
];

const targetAreas = [
    'target-area-1',
    'target-area-2'
];

export function DragDrop() {

    return {
        overlappingTarget: false,
        draggableItems: {
            'target-area-1': draggableItemsList,
            'target-area-2': [
                {
                    id: 'draggable-frog',
                    title: 'Frog'
                }
            ]
        },

        checkIfDraggableIsOverlapping() {
            const { $el, $data } = this;
            const overlappingTarget = elementOverlappingTargetInTargets({
                element: $el,
                ids: targetAreas
            });
            $data.overlappingTarget = overlappingTarget || false;
        },

        onAppendDraggable(targetAreaId) {
            const {
                $event: {
                    detail: {
                        node: draggingId,
                        area: trueTargetAreaId
                    }
                },
                $data,
                $el
            } = this;
            if (targetAreaId !== trueTargetAreaId) return;

            console.log({
                elId: $el.id,
                targetAreaId,
                trueTargetAreaId
            })

            let draggingData = {};

            const newDraggableItems = clone($data.draggableItems);

            // Add the draggingId to the targetAreaId array in draggableItems
            // First check if it's already in the array
            if (newDraggableItems[targetAreaId].find(item => item.id === draggingId)) return;
            // Remove the draggingId from any other arrays in draggableItems
            const areas = Object.entries(newDraggableItems);
            for (const [areaId, area] of areas) {
                const targetIdIndex = area.findIndex(item => item.id === draggingId);
                if (targetIdIndex !== -1) {
                    // We found the dragging item in a different array
                    // Set dragging data
                    draggingData = newDraggableItems[areaId][targetIdIndex];
                    newDraggableItems[areaId].splice(targetIdIndex, 1);
                }
            }
            // Add the item to the array
            newDraggableItems[targetAreaId].push(draggingData);
            this.$data.draggableItems = newDraggableItems;
        },

        handleClickTargetArea() {
            const { $el, $data } = this;
        }
    }
}