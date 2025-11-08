import { NavbarGroup } from "@/types";
import { Clapperboard, Disc3, GalleryHorizontal, LayoutGrid } from "lucide-vue-next";
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
