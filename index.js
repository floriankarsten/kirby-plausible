panel.plugin("floriankarsten/plausible", {
	components: {
		'k-plausible-view': {
			template: `
				<k-panel-inside class="k-plausible-view">
						<k-section>
							<iframe v-if="sharedLink" plausible-embed v-bind:src="sharedLink + '&embed=true&theme=light&background=%23efefef'" scrolling="no" frameborder="0" loading="lazy" class="plausible-iframe"></iframe>
							<script async src="https://plausible.io/js/embed.host.js"></script>
							<div style="margin-top: 30px; text-align: center;" v-else>
								<code>You need to set floriankarsten.plausible.sharedLink in config.php</code>
							</div>
						</k-section>
				</k-panel-inside>
			`,
			props: ["sharedLink"],
		},
	},
});