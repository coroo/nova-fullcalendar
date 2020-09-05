<template>
    <modal @modal-close="handleClose" classWhitelist="flatpickr-calendar">
        <div
            class="bg-white rounded-lg shadow-lg overflow-hidden"
            style="width: 460px"
        >
            <slot :uppercaseMode="uppercaseMode" :mode="mode">
                <div class="p-8">
                    <heading v-if="!currentEvent" :level="2" class="mb-6">{{ __('Tidak ada event yang dipilih') }}</heading>
                    <h1 v-if="currentEvent" for="title" class="mb-2 text-80 leading-tight">{{ title }}</h1>
                    <p v-if="currentEvent" for="start" class="mb-2 text-80 leading-tight">{{ start }}</p>
                </div>
            </slot>

            <div class="btn-wrapper bg-30 px-6 py-3" v-if="currentEvent">
                <a v-if="currentEvent" :href="resources" class="btn btn-default btn-primary">{{__('Lihat Detil Acara') }}</a>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        name: 'EventModal',
        props: ['currentEvent', 'currentDate', 'card'],
        data() {
            let id = this.currentEvent !== null ? this.currentEvent.event.id : '';
            return {
                resources: this.card.resource !== null ? '../resources/' + this.card.resource + '/' + id : '',
                id: id,
                title: this.currentEvent !== null ? this.currentEvent.event.title : '',
                start: moment(this.currentEvent !== null ? this.currentEvent.event.start : this.currentDate.date).format('YYYY-MM-DD HH:mm:ss'),
            }
        },
        methods: {
            changeStart(value) {
                this.start = value;
            },
            handleClose() {
                this.$emit('close');
            },
        },
    }
</script>

<style scoped>
    label {
        display: block;
    }

    .btn-wrapper {
        display: flex;
        justify-content: flex-end;
    }

    .btn.delete-event {
        margin-right: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>