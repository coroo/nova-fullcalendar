<template>
    <div>
        <div class="card py-6 px-6">
            <FullCalendar ref="fullCalendar" :options="calendarOptions" />
        </div>

        <transition v-if="resources" name="fade">
            <EventModal
                v-if="showModal"
                :currentEvent="currentEvent"
                :currentDate="currentDate"
                :card="card"
                @refreshEvents="refreshEvents"
                @close="closeModal"
                @confirm="saveEvent"
                @delete="deleteEvent"
            />
        </transition>
    </div>
</template>

<script>
    import FullCalendar from '@fullcalendar/vue';
    import dayGridPlugin from '@fullcalendar/daygrid';
    import interactionPlugin from '@fullcalendar/interaction';
    import EventModal from './EventModal';

    export default {
        components: {
            FullCalendar,
            EventModal
        },
        data() {
            return {
                resources: this.card.resource !== null ? this.card.resource : '',
                calendarOptions: {
                    events: Object.values(this.card.series),
                    plugins: [ dayGridPlugin, interactionPlugin ],
                    initialView: 'dayGridMonth',
                    dateClick: this.handleDateClick,
                    eventClick: this.handleEventClick,
                    eventTimeFormat: {
                        hour: '2-digit',
                        minute: '2-digit',
                        meridiem: false
                    }
                },
                currentEvent: null,
                currentDate: null,
                showModal: false
            }
        },
        props: [
            'card'
        ],
        methods: {
            handleDateClick(date) {
                this.showModal = true;
                this.currentDate = date;
            },
            handleEventClick(event) {
                this.showModal = true;
                this.currentEvent = event;
            },
            closeModal() {
                this.showModal = false;
                this.currentEvent = null;
                this.currentDate = null;
            },
            refreshEvents() {
                this.$refs.fullCalendar.getApi().refetchEvents();
            }
        },
    }
</script>

<style>
</style>