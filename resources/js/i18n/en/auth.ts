import Label from "@/components/ui/label/Label.vue";

export default {
    login: {
        title: "Log in",
        description: "Enter your email and password below to log in",
        credentials: {
            email: {
                label: "Email address",
                placeholder: "email@example.com"
            },
            password: {
                label: "Password",
                forgot: "Forgot password?"
            },
            remember_me: "Remember me"
        },
        submit_button: "Log in",
        register_link: {
            label: "Don't have an account?",
            link: "Sign up"
        }
    },
    forgot_password: {
        title: "Forgot password",
        description: "Enter your email ot receive a password reset link",
        credentials: {
            email: {
                label: "Email address",
                placeholder: "email@example.com"
            },
        },
        submit_button: "Email password reset link",
        return_link: {
            text: "Or, return to",
            link: "log in"
        }
    },
    register: {
        title: "Create an account",
        description: "Enter your details below to create your account",
        credentials: {
            name: {
                label: "Name",
                placeholder: "Full name"
            },
            email: {
                label: "Email address",
                placeholder: "email@example.com"
            },
            password: {
                label: "Password",
                placeholder: "Password"
            },
            confirm_password: {
                label: "Confirm password",
                placeholder: "Confirm password"
            }
        },
        submit_button: "Create account",
        login_link: {
            label: "Alredy have an account?",
            link: "Log in"
        }
    }
};
