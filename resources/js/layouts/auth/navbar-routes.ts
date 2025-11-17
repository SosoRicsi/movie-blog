import { NavbarGroup } from "@/types";
import { Clapperboard, Disc3, GalleryHorizontal, LayoutGrid, PlusCircle, User, Users } from "lucide-vue-next";
import { route, has } from "@/lib/routes";

export const navbarRoutes = [
    {
        groupLabel: "Platform",
        items: [
            {
                title: 'Dashboard',
                href: route('dashboard'),
                icon: LayoutGrid,
            },
            {
                title: 'Főoldal',
                href: '/',
                icon: GalleryHorizontal
            }
        ],
    },
    ...(has('films.create') ? [{
        groupLabel: "Filmek",
        items: [
            {
                title: 'Létrehozás',
                href: route('films.create'),
                icon: Clapperboard
            }
        ]
    }] : []),
    {
        groupLabel: "Mail",
        items: [
            ...(has('mails.users.create') ? [{
                title: 'Felhasználó létrehozás',
                href: route('mails.users.create'),
                icon: PlusCircle
            }] : []),
            ...(has('mails.users.index') ? [{
                title: 'Felhasználók',
                href: route('mails.users.index'),
                icon: Users
            }] : []),
        ]
    }
] as NavbarGroup[];

export const navfooterRoutes = [
    {
        groupLabel: "További információk",
        items: [
            {
                title: 'Discord',
                href: '/dsc',
                icon: Disc3
            }
        ]
    }
] as NavbarGroup[];
