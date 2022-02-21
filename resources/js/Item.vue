<template>
    <main>
        <Nav @setInput="setInput"></Nav>
        <!-- loading data -->
        <template v-if="loading">
                <h2>loading ..</h2>
        </template>
        <div id="item_list" v-if="items">
            <div :id="'item_'+item.rank" class="item" v-for="item in items" :key="item.itemNo">
                <div class="item_header">
                    <div class="item_no">{{ item.rank.padStart(2,'0') }}</div>
                    <div :class="'item_rank '+item.rank_class">{{ item.rank_cal }}</div>
                </div>
                <img :src="item.thumb" alt="" class="item_img">
                <div class="item_title">{{ item.itemTitle }}</div>
                <div class="item_price"><span>{{ item.price.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",") }}</span>원</div>
                <div class="item_uni">최소 {{ item.qty }}개</div>
            </div>
        </div>
    </main>
</template>

<script>
import Nav from './Nav.vue';
export default {
    components: {
        Nav
    },
    data() {
        return {
            items: {},
            loading: false,
        }
    },
    created() {
        this.getitemlist();
    },
    methods: {
        async getitemlist(cats='01_00'){
            this.loading = true;
            await axios.get('/item?cats=' + cats)
            .then((response) => {
                this.loading = false
                response.data.forEach(el => {
                    // Rank 변동 check
                    el.rank_class = '';
                    el.rank_cal = '';
                    el.rank_cal = el.rankYesterday - el.rank;
                    
                    if(Math.sign(el.rank_cal) == 1){
                        el.rank_class = 'positive';
                        el.rank_cal = `▲ ${el.rank_cal}`;
                    }else if(Math.sign(el.rank_cal) == -1){
                        el.rank_class = 'negative';
                        el.rank_cal = `▼ ${-el.rank_cal}`;
                    }else if(el.rank_cal == 0){
                        el.rank_class = '';
                        el.rank_cal = '-';
                    }
                    
                    // NEW 상품
                    if(el.rankYesterday == 'NEW'){
                        el.rank_class = 'positive';
                        el.rank_cal = `NEW`;
                    }
                });
                this.items = response.data;
                console.log(this.items);
                // console.log(this);
            })
            .catch((error) => {
                this.loading = false
                console.log(error);
            })
        },
        setInput(num) {
            this.getitemlist(num);
        }
    }
}
</script>
