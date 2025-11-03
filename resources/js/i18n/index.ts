import { createI18n } from 'vue-i18n';
import hu from './hu';
import en from './en';

const i18n = createI18n({
    legacy: false,
    locale: document.documentElement.lang || 'hu',
    fallbackLocale: 'en',
    messages: {
        hu,
        en
    }
});

export default i18n;
