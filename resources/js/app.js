import Fjord from "fjord";
import FjordPermissions from "fjord-permissions";

window.moment = require("moment");

require("./service/component.service");
import VueGtag from "vue-gtag";

Vue.use(VueGtag, {
    config: { id: "UA-77559383-18" }
});

const store = {};

Fjord.use(FjordPermissions)

new Fjord({
    store
});
