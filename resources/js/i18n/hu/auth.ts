export default {
    login: {
        title: "Bejelentkezés",
        description: "Adja meg a fiókjához tartozó e-mail címet és jelszót.",
        credentials: {
            email: {
                label: "Email address",
                placeholder: "email@example.com"
            },
            password: {
                label: "Jelszó",
                forgot: "Elfelejtetted a jelszavad?",
            },
            remember_me: "Bejelentkezve maradok"
        },
        submit_button: "Bejelentkezés",
        register_link: {
            label: "Nincs még fiókod?",
            link: "Regisztráció"
        }
    },
    forgot_password: {
        title: "Jelszó visszaállítás",
        description: "Adja meg az e-mail címért, hogy elküldhessük a visszaállító linket",
        credentials: {
            email: {
                label: "E-mail cím",
                placeholder: "pelda@valami.hu"
            },
        },
        submit_button: "Visszaállító link küldése",
        return_link: {
            text: "Visszatérés a",
            link: "bejelentkezéshez"
        }
    },
    register: {
        title: "Regisztráció",
        description: "Adja meg az adatait a regisztrációhoz",
        credentials: {
            name: {
                label: "Teljes név",
                placeholder: "Teljes név"
            },
            email: {
                label: "E-mail cím",
                placeholder: "pelda@valami.hu"
            },
            password: {
                label: "Jelszó",
                placeholder: "Jelszó"
            },
            confirm_password: {
                label: "Jelszó újra",
                placeholder: "Jelszó újra"
            }
        },
        submit_button: "Regisztráció",
        login_link: {
            label: "Már van fiókod?",
            link: "Bejelentkezés"
        }
    }
}
