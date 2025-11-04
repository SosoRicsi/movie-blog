import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

interface NavbarGroup {
    groupLabel: string;
    items: NavItem[];
};

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export type Project = {
    image: {
        url: string;
        placeholder: string;
    };
    category: {
        id: number;
        title: string;
    };
    status: {
        title: string;
        color: string;
        deleted: boolean;
    };
    id: number;
    title: string;
    description: string;
};;
