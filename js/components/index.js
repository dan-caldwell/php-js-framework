import SingleSidebarItem from './single-sidebar-item.js';
import PostBody from './post/post-body.js';

const components = {
    'single-sidebar-item': SingleSidebarItem,
    'post-body': PostBody
}
for (const componentName in components) customElements.define(componentName, components[componentName]);