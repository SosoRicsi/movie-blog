export default {
    profile: {
        title: "Profile settings",
        informations_title: "Profile information",
        description: "Update your name and email address",
        breadcrumbs: {
            settings: "Settings",
            profile_settings: "Profile Settings"
        },
        credentials: {
            name: {
                label: "Name",
                placeholder: "Full name"
            },
            email: {
                label: "Email address",
                placeholder: "Email address",
                verify: {
                    label: "Your email address is unverified.",
                    submit_button: "Click here to resend the verification email.",
                    success: "A new verification link has been sent to your email address."
                }
            },
            success: "Saved."
        },
        submit_button: "Save",
        delete_account: {
            title: "Delete account",
            description: "Delete your account and all of its resources"
        }
    },
    delete_account: {
        title: "Warning",
        description: "Please proceed with caution, this cannot be undone.",
        submit_button: "Delete account",
        confirm: {
            title: "Are you sure you want to delete your account?",
            description: "Once your account is deleted, all of its resources and data will also be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.",
            credentials: {
                password: {
                    label: "Password",
                    placeholder: "Password"
                }
            },
            cancel_button: "Cancel",
            submit_button: "Delete account"
        }
    },
    password: {
        title: "Password settings",
        information_title: "Update password",
        description: "Ensure your account is using a long, random password to stay secure",
        breadcrumbs: {
            settings: "Settings",
            password_settings: "Password settings"
        },
        credentials: {
            current_password: {
                label: "Current password",
                placeholder: "Current password"
            },
            new_password: {
                label: "New password",
                placeholder: "New password"
            },
            confirm_password: {
                label: "Confirm password",
                placeholder: "Confirm password"
            }
        },
        submit_button: "Save password",
        success: "Saved."
    },
    appearance: {
        title: "Appearance settings",
        description: "Update your account's appearance settings",
        breadcrumbs: {
            settings: "Settings",
            appearance_settings: "Appearance settings"
        },
        tabs: {
            light: "Light",
            dark: "Dark",
            system: "System"
        }
    }
};
