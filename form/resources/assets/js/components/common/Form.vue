<template>
	<div class="relative">
		<div
			:class="[
				'transition-opacity duration-300 ease-out-cubic',
				{
					'opacity-0': $data.response,
				},
			]"
		>
			<formulate-form
				:class="{
					'pointer-events-none': !cIsSubmitEnabled,
				}"
				:disabled="!cIsSubmitEnabled"
				novalidate
				@submit="onSubmit"
			>
				<div class="space-y-5">
					<formulate-input
						v-for="el in $props.schema"
						:key="el.name"
						v-model="$data.form[el.name]"
						v-bind="el"
						:class="{
							'e-error': $data.errors[el.name],
						}"
						:input-class="(context, classes) => [
							{
								'border-red': $data.errors[el.name],
							},
						].concat(classes)"
						:errors="$data.errors[el.name]"
					/>
				</div>
			</formulate-form>
		</div>

		<aside
			ref="response"
			:class="[
				'flex justify-center items-center absolute z-1 inset-0 pointer-events-none',
				'transform',
				'transition-all duration-300 ease-out-cubic',
				{
					'opacity-0 translate-y-10': !$data.response,
				},
			]"
		>
			<div
				v-if="$data.response"
				class="w-18/24 text-center pointer-events-auto"
			>
				<p
					class="e-h3"
					v-text="$data.response.title"
				/>

				<p
					v-if="$data.response.copy"
					class="mt-4"
					v-text="$data.response.copy"
				/>
			</div>
		</aside>
	</div>
</template>

<script>
	import form from '../../mixins/form';

	export default {
		mixins: [
			form,
		],

		props: {
			schema: {
				type: Array,
				default: null,
			},
		},

		watch: {
			response(data) {
				if (data) {
					this.$nextTick(() => {
						this.$refs.response.scrollIntoView({ behavior: 'smooth' });
					});
				}
			},
		},
	};
</script>
