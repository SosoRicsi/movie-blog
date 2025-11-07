import auth from "./auth";
import settings from "./auth/settings";
import brand from "./brand/brand";

export default {
    settings,
    brand,
    ...auth
}
