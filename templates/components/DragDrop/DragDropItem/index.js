export function DragDropItem({ title, id }) {
    return {
        dragging: false,
        dragX: 0,
        dragY: 0,
        startX: 0,
        startY: 0,
        title,
        id,

        handleMouseDown() {
            const { $data, $event } = this;
            $data.startX = $event.clientX;
            $data.startY = $event.clientY;
            $data.dragging = true;
        },

        handleMouseMove() {
            const { $data, $event } = this;
            if ($data.dragging) {
                $data.dragX = $event.clientX - $data.startX;
                $data.dragY = $event.clientY - $data.startY;
                this.checkIfDraggableIsOverlapping();
            }
        },

        handleMouseUp() {
            const { $data } = this;
            if ($data.overlappingTarget) {
                // The draggable item is overlapping the target box, so move it there
                this.$dispatch('append-draggable', {
                    node: this.$el.id,
                    area: $data.overlappingTarget
                });
            }
            $data.dragging = false;
            $data.overlappingTarget = false;
            $data.startX = 0;
            $data.startY = 0;
            $data.dragX = 0;
            $data.dragY = 0;
        }
    }
}