import BasicComponent from './components/BasicComponent'

Nova.booting((Vue, router, store) => {
    Vue.component('full-calendar', BasicComponent);
})
