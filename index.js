panel.plugin("floriankarsten/plausible", {
	views: {
		plausible: {
			label: 'Analytics',
			icon: "road-sign",
			component: {
				template: `
				<div class="k-plausible-view">
					<div style="margin-top: 30px; text-align: center;" v-if="showError">
						<code>You need to set floriankarsten.plausible.sharedLink in config.php</code>
					</div>
					<iframe v-if="sharedLink" plausible-embed v-bind:src="sharedLink" scrolling="no" frameborder="0" loading="lazy" style="width: 1px; min-width: 100%; height: 1600px;"></iframe>
				</div>`,
				data: function() {
					return {
						options: {},
						showError: false,
						sharedLink: ","
					};
				},
				created: function() {
					this.$api
						.get("plausible")
						.then(options => {
							if(!options.sharedLink) {
								this.showError = true;
							} else {
								this.sharedLink = options.sharedLink + "&embed=true&theme=light"
							}
					});
				}
			},
		}
	}
});