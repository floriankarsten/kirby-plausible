panel.plugin("floriankarsten/plausible", {
	components: {
		'k-plausible-view': {
			template: `
				<k-inside>
					<k-view class="k-plausible-view">
						<iframe v-if="sharedLink" plausible-embed v-bind:src="sharedLink + '&embed=true&theme=light&background=%23efefef'" scrolling="no" frameborder="0" loading="lazy" class="plausible-iframe"></iframe>
						<div style="margin-top: 30px; text-align: center;" v-else>
							<code>You need to set floriankarsten.plausible.sharedLink in config.php</code>
						</div>
					</k-view>
				</k-inside>
			`,
			props: ["sharedLink"],
		},
	},
});