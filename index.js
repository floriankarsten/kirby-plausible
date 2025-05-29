panel.plugin("floriankarsten/plausible", {
	components: {
		"k-plausible-view": {
			template: `
				<k-panel-inside class="k-plausible-view">
						<k-section>
							<template v-if="sharedLink">
								<iframe
									plausible-embed
									:src="sharedLink + '&embed=true&theme=' + theme + '&background=transparent'"
									frameborder="0"
									loading="lazy"
									scrolling="no"
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
				theme() {
					return this.$panel.theme?.current ?? "light";
				},
			},
		},
	},
});
