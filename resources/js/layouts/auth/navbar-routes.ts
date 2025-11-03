import { NavbarGroup } from "@/types";
import { Disc3, GalleryHorizontal, LayoutGrid } from "lucide-vue-next";

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
