import { Updater } from '@tanstack/vue-table';
import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';
import { Ref } from 'vue';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function valueUpdater<T>(
    updaterOrValue: Updater<T> | T,
    ref: Ref<T>,
) {
    if (typeof updaterOrValue === 'function') {
        // TanStack updater függvény
        // @ts-expect-error – TanStack Updater típusa kicsit trükkös
        ref.value = updaterOrValue(ref.value)
    } else {
        ref.value = updaterOrValue
    }
}
