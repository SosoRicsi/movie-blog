import { NavbarGroup } from "@/types";
import { Clapperboard, Disc3, GalleryHorizontal, LayoutGrid } from "lucide-vue-next";

export const navbarRoutes = [
    {
        groupLabel: "Platform",
        items: [
            {
                title: 'Dashboard',
                href: 'dashboard',
                icon: LayoutGrid,
            },
            {
                title: 'Főoldal',
                href: '/',
                icon: GalleryHorizontal
            }
        ],
    },
    {
        groupLabel: "Filmek",
        items: [
            {
                title: 'Létrehozás',
                href: '',
                icon: Clapperboard
            }
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
