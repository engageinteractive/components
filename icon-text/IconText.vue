<template>
	<component
		:is="cTag"
		:class="[
			'items-center space-x-3',
			$props.inline ? 'inline-flex' : 'flex',
			{
				'flex-row-reverse space-x-reverse justify-end': $props.iconAfter,
			},
		]"
	>
		<icon :name="icon" />

		<span v-html="text" />
	</component>
</template>

<script>
	export default {
		props: {
			icon: {
				type: String,
				required: true,
			},

			tag: {
				type: String,
				default: 'div',
			},

			text: {
				type: String,
				required: true,
			},

			iconAfter: Boolean,

			inline: Boolean,
		},

		computed: {
			cTag() {
				return this.$attrs.href ? 'a' : this.$props.type;
			},
		},
	};
</script>
