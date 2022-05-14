<script>
import ScriptShow from "@/components/ScriptShow";
export default {
    components: {
        ScriptShow
    },
    data() {
        return {
            domain: '',
            error_msg: '',
            showScript: 0,
            domain_list: [],
        }
    },
    mounted() {
        axios.post('/api/site/get',{
            user_id: this.$page.props.auth.user.id
        }).then(response => {
            this.domain_list = response.data;
        })
    },
    methods: {
        addDomain() {
            if(this.domain == '') {
                return this.error_msg = 'Поле домен не должно быть пустым';
            }
            if(this.domain.length > 255) {
                return this.error_msg = 'Длинна домена не должна быть больше 255';
            }
            this.error_msg = '';
            axios.post('/api/site/add',{
                domain: this.domain,
                user_id: this.$page.props.auth.user.id
            })
            .then(response => {
                if(response.statusText == 'OK'){
                    if (!this.domain_list.hasOwnProperty(response.data.id)) {
                        this.domain_list[response.data.id] = response.data;
                    } else {
                        this.error_msg = 'Данный url уже есть в списке';
                    }

                }
            })
            .catch(function (error){
                console.log(error)
            });
        },
        getUrl(url, id) {
            return url+id
        }
    }
}
</script>
<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <h1>Список сайтов</h1>
                    <div class="form-block">
                        <p class="error-msg">{{error_msg}}</p>
                        <form @submit.prevent="addDomain">
                            <input class="border-b" v-model="domain" placeholder="Домен">
                            <button class="border padding-5">Добавить</button>
                        </form>
                    </div>
                </div>
                <ul>
                    <li class="domain-list" v-for="domain in domain_list">
                        <p class="domain-name">{{domain.domain}}</p>
                        <div class="select-info">
                            <button @click="showScript=domain.id">Показать скрипт</button>
                            <a v-bind:href="getUrl('/map/', domain.id)">Карта кликов</a>
                            <a v-bind:href="getUrl('/chart/', domain.id)">График</a>
                        </div>
                    </li>
                </ul>
            </div>
            <ScriptShow :id="showScript"/>
        </div>
    </div>
</template>
