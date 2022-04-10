class Component extends HTMLElement {

    constructor() {
        super();
    }

    attachIds() {
        const allIds = [...this.querySelectorAll('[data-ref]')];
        if (this.getAttribute('data-ref')) allIds.push(this);
        // Filter out ids where the first custom parent is not 'this'
        // Helps to prevent duplication
        const filteredIds = allIds.filter(el => {
            const parent = this.getElementCustomElementParent(el);
            return parent.tagName.toLowerCase() === this.tagName.toLowerCase()
        });
        (this.usesContext ? allIds : filteredIds).forEach(el => {
            const callbackAttribute = el.getAttribute('data-ref');
            const parentCustom = this.getElementCustomElementParent(el);
            if (parentCustom && callbackAttribute && parentCustom[callbackAttribute]) {
                // Proxy handler for event listeners
                const onHandler = {
                    set(target, prop, value) {
                        if (!el.on[prop]) {
                            target[prop] = value;
                            el.addEventListener(prop, value);
                        }
                        return true;
                    }
                }
                if (!el.on) {
                    el.on = new Proxy({}, onHandler);
                }
                parentCustom[callbackAttribute](el);
            }
        })
    }

    // Get the parent custom element of any element
    getElementCustomElementParent(element) {
        let parent = {
            tagName: '',
            parentElement: element
        };
        // If checking a custom element, return that custom element
        if (element.tagName.includes('-')) return element;
        while (!parent.tagName.includes('-')) {
            parent = parent.parentElement;
            if (parent.tagName === 'BODY') return parent;
        }
        return parent;
    }

    useState(initialValue) {
        const self = this;
        const handler = {
            set(target, prop, value) {
                target[prop] = value;
                // Set the inner value of all the state elements
                const stateElements = self.querySelectorAll(`[data-val="${prop}"]`);
                stateElements.forEach(element => {
                    element.innerHTML = value;
                });
                // Re-render all the ID functions
                self.attachIds();
                return true;
            }
        }

        return new Proxy(initialValue, handler);
    }

    connectedCallback() {
        if (!this.usesContext) {
            this.attachIds();
        }
        if (document.body.style.display === "none") {
            document.body.style.display = null;
        }
    }

}