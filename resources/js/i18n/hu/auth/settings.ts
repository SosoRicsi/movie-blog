export default {
    profile: {
        title: "Profil módosítás",
        informations_title: "Profil információk",
        description: "Frissítsd a nevedet és e-mail címedet",
        breadcrumbs: {
            settings: "Beállítások",
            profile_settings: "Profil módosítás"
        },
        credentials: {
            name: {
                label: "Teljes név",
                placeholder: "Teljes név"
            },
            email: {
                label: "E-mail cím",
                placeholder: "E-mail cím",
                verify: {
                    label: "Az e-mail címed nincs megerősítve.",
                    submit_button: "Megerősítő link újraküldése.",
                    success: "Az új megerősítő link el lett küldve az e-mail címére."
                }
            },
            success: "Mentve."
        },
        submit_button: "Mentés",
        delete_account: {
            title: "Fiók törlése",
            description: "Törölje fiókját, és a hozzá tartozó tartalmakat"
        }
    },
    delete_account: {
        title: "Figyelem",
        description: "Kérjül vegye figyelembe, hogy ezt a műveletet nem lehet visszafordítani!",
        submit_button: "Fiók törlése",
        confirm: {
            title: "Biztosan törölni szeretné fiókját?",
            description: "A fiók törlés egy visszafordíthatatlan művelet, amennyiben törli a fiókjátm az végleges. Kérjük addja meg a jelszavát, ha végleg törölni szeretné a fiókját.",
            credentials: {
                password: {
                    label: "Jelszó",
                    placeholder: "Jelszó"
                }
            },
            cancel_button: "Mégse",
            submit_button: "Fiók törlése"
        }
    },
    password: {
        title: "Jelszó módosítás",
        information_title: "Jelszó frissítés",
        description: "Használj egy hosszú, erős jelszót a fiókja biztonsága érdekében",
        breadcrumbs: {
            settings: "Beállítások",
            password_settings: "Jelszó módosítás"
        },
        credentials: {
            current_password: {
                label: "Jelenlegi jelszó",
                placeholder: "Jelenlegi jelszó"
            },
            new_password: {
                label: "Új jelszó",
                placeholder: "Új jelszó"
            },
            confirm_password: {
                label: "Jelszó újra",
                placeholder: "Jelszó újra"
            }
        },
        submit_button: "Mentés",
        success: "Mentve."
    },
    appearance: {
        title: "Megjelenés",
        description: "Állítsa be az alkalmazás színtémáját",
        breadcrumbs: {
            settings: "Beállítások",
            appearance_settings: "Megjelenés módosítása"
        },
        tabs: {
            light: "Világos",
            dark: "Sötét",
            system: "Rendszer"
        }
    }
};
