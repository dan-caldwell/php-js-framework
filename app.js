import Alpine from 'alpinejs';
import { DragDrop } from './templates/components/DragDrop';
import { DragDropItem } from './templates/components/DragDrop/DragDropItem';

window.Alpine = Alpine;

Alpine.data('DragDrop', DragDrop);
Alpine.data('DragDropItem', DragDropItem);

Alpine.start();