panel.plugin("floriankarsten/plausible", {
	components: {
		"k-plausible-view": {
			template: `
				<k-panel-inside class="k-plausible-view">
						<k-section>
							<template v-if="sharedLink">
								<iframe
									plausible-embed
									:src="sharedLink + '&embed=true&theme=' + theme + '&background=' + background"
									scrolling="no"
									frameborder="0"
									loading="lazy"
									class="plausible-iframe"
								/>
								<component is="script" async src="https://plausible.io/js/embed.host.js" />
							</template>
							<k-box
								v-else
								icon="info"
								theme="info"
							>
								You need to set <code>floriankarsten.plausible.sharedLink</code> in <code>config.php</code>
							</k-box>
						</k-section>
				</k-panel-inside>
			`,
			props: {
				sharedLink: String,
			},
			computed: {
				background() {
					return this.theme === "light" ? "%23f0f0f0" : "%231f1f1f";
				},
				theme() {
					return this.$panel.theme?.current ?? "light";
				},
			},
		},
	},
});
