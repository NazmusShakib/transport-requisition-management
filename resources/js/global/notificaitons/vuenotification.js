import Vue from 'vue';
import VueNotification from "@kugatsu/vuenotification";

Vue.use(VueNotification, {
    timer: 10,
    position: 'bottomRight',
    animateIn: function () {
        var tl = new TimelineMax()
            .from(this.notificationEl, 0.6, {
                opacity: 0
            })
            .from(this.notificationEl, 0.4, {
                borderRadius: 100,
                width: 58,
                height: 58
            })
            .from(this.notificationElContent, 0.3, {
                opacity: 0
            });
        return tl;
    }
});

export default {

}
