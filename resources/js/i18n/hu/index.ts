import auth from "./auth";
import settings from "./auth/settings";
import brand from "./brand/brand";
import film from "./film";

export default {
    settings,
    brand,
    film,
    ...auth
}
