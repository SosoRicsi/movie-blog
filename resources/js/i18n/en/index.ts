import auth from "./auth";
import settings from "./auth/settings";
import brand from "./brand/brand";
import film from "./film";
import mails from "./mails";

export default {
    settings,
    brand,
    mails,
    film,
    ...auth
}
