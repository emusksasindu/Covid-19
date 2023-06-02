<template>
  <div class="main">
    <h1>Statistics</h1>
    <div class="card-container">
      <GlassmorphismCard
        v-if="latestStatistic"
        icon="fas fa-virus"
        topic="Total Confirmed Cases"
        :text1="`Local: ${latestStatistic.local_total_cases || 0}`"
        :text2="`Global: ${latestStatistic.global_total_cases || 0}`"
      />
      <GlassmorphismCard
        v-if="latestStatistic"
        icon="fas fa-heartbeat"
        topic="Active Cases"
        :text1="`Local: ${latestStatistic.local_active_cases || 0}`"
        :text2="`Global: ${latestStatistic.global_active_cases || 0}`"
      />
      <GlassmorphismCard
        v-if="latestStatistic"
        icon="fas fa-chart-line"
        topic="Daily New Cases"
        :text1="`Local: ${latestStatistic.local_new_cases || 0}`"
        :text2="`Global: ${latestStatistic.global_new_cases || 0}`"
      />

      <GlassmorphismCard
        v-if="latestStatistic"
        icon="fas fa-medkit"
        topic="Recovered"
        :text1="`Local: ${latestStatistic.local_recovered || 0}`"
        :text2="`Global: ${latestStatistic.global_recovered || 0}`"
      />
      <GlassmorphismCard
        v-if="latestStatistic"
        icon="fas fa-skull-crossbones"
        topic=" Deaths"
        :text1="`Local: ${latestStatistic.local_deaths || 0}`"
        :text2="`Global: ${latestStatistic.global_deaths || 0}`"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import GlassmorphismCard from "../components/GlassmorphismCard.vue";
export default {
  name: "HomePage",
  components: {
    GlassmorphismCard,
  },
  data() {
    return {
      statistics: [],
      latestStatistic: null,
    };
  },
  mounted() {
    this.fetchStatistics();
  },
  methods: {
    fetchStatistics() {
      axios
        .get("http://127.0.0.1:8000/api/covid-statistics")
        .then((response) => {
          this.statistics = response.data;
          this.latestStatistic = this.getLatestStatistic();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getLatestStatistic() {
      if (this.statistics.length > 0) {
        return this.statistics[this.statistics.length - 1];
      }
      return null;
    },
  },
};
</script>

<style scoped>
.main{
  background: url("https://rare-gallery.com/thumbnail/1338831-WhiteAbstract-Hexagon-4k-Ultra-HD-Wallpaper.png");
  padding-bottom: 3.5rem;
}
h1 {
  font-size: 4rem;
  text-align: center;
  margin-top: 2rem;
  margin-bottom: 2rem;
  color: rgb(109, 109, 109);
}

.card-container {
  margin-top: 3.5rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: auto auto;
  justify-items: center;
  gap: 10px;
  row-gap: 6rem;
  
}

.single-card {
  grid-column: 1 / span 2;
  display: flex;
  justify-content: center;
}

.card {
  width: fit-content;
  height: fit-content;
  background: rgba(0, 0, 0, 0.721);
  border-radius: 10px;
  backdrop-filter: blur(10px);
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgb(255, 255, 255);
  padding: 60px;
}

.card-content {
  text-align: center;
}

.card-title {
  font-weight: bold;
  font-size: 3rem;
  margin-bottom: 10px;
}
</style>