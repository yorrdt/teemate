import { mixin as clickaway } from 'vue-clickaway';

export default {
	name: 'account-menu',
	mixins: [ clickaway ],
	data() {
		return {
			visible: false,
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