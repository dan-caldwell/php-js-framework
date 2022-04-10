const sayHi = () => {
    console.log('hi');
}

export default class SingleSidebarItem extends Component {

    container(el) {
        el.className = `flex p-2`;
    }

    title(el) {
        el.className = `font-bold text-lg mr-2`;
        el.on.click = sayHi;
    }

    category(el) {
        el.className = `mx-2`;
    }

    thumbnail(el) {
        el.className = `w-8 h-8`;
        el.on.click = () => {
            console.log('clicked on thumbnail');
        }
    }

}

