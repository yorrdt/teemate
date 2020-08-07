import { mixin as clickaway } from 'vue-clickaway';
/* import json from '../data/menu.json'; */

export default {
	name: 'account-menu',
	mixins: [ clickaway ],
	data() {
		return {
			visible: false,
			/* jsonData: json, */
		}
	},
	methods: {
		away: function() {
			if(this.visible) {
				this.visible = false;
			}
		},
	},
}