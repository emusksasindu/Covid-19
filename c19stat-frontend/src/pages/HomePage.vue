<template>
  <div>
    <h1>Statistics</h1>
    <div class="card-container">
      <div v-if="latestStatistic" class="card">
        <div class="card-content">
          <div class="local-statistics-block">
            <p class="card-title">Local Statistics</p>
            <p><i class="fas fa-virus local-icon"></i> Total Confirmed Cases</p>
            <p class="local-data-value">{{ latestStatistic.local_total_cases || 0 }}</p>
            <p><i class="fas fa-heartbeat local-icon"></i> Active Cases</p>
            <p class="local-data-value">{{ latestStatistic.local_active_cases || 0 }}</p>
            <p><i class="fas fa-chart-line local-icon"></i> Daily New Cases</p>
            <p class="local-data-value">{{ latestStatistic.local_new_cases || 0 }}</p>
            <p><i class="fas fa-medkit local-icon"></i> Recovered</p>
            <p class="local-data-value">{{ latestStatistic.local_recovered || 0 }}</p>
            <p><i class="fas fa-skull-crossbones local-icon"></i> Deaths</p>
            <p class="local-data-value">{{ latestStatistic.local_deaths || 0 }}</p>
          </div>
        </div>
      </div>
      <div v-if="latestStatistic" class="card">
        <div class="card-content">
          <div class="global-statistics-block">
            <p class="card-title">Global Statistics</p>
            <p><i class="fas fa-globe global-icon"></i> Total Confirmed Cases</p>
            <p class="global-data-value">{{ latestStatistic.global_total_cases || 0 }}</p>
            <p><i class="fas fa-heartbeat global-icon"></i> Active Cases</p>
            <p class="global-data-value">{{ latestStatistic.global_active_cases || 0 }}</p>
            <p><i class="fas fa-chart-line global-icon"></i> Daily New Cases</p>
            <p class="global-data-value">{{ latestStatistic.global_new_cases || 0 }}</p>
            <p><i class="fas fa-medkit global-icon"></i> Recovered</p>
            <p class="global-data-value">{{ latestStatistic.global_recovered || 0 }}</p>
            <p><i class="fas fa-skull-crossbones global-icon"></i> Deaths</p>
            <p class="global-data-value">{{ latestStatistic.global_deaths || 0 }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HomePage',
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
        .get('http://127.0.0.1:8000/api/covid-statistics')
        .then(response => {
          this.statistics = response.data;
          this.latestStatistic = this.getLatestStatistic();
        })
        .catch(error => {
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
h1 {
  font-size: 4rem;
  text-align: center;
  margin-top: 2rem;
  margin-bottom: 2rem;
  color: rgb(109, 109, 109);
}

.card-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-bottom: 2rem;
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

.local-statistics-block {
  font-size: 20px;
}

.local-statistics-block p {
  display: flex;
  align-items: center;
  margin: 5px 0;
}

.local-icon {
  margin-right: 10px;
  font-size: 3rem;
  color: rgb(255, 0, 106);
}



.global-statistics-block {
  font-size: 20px;
}

.global-statistics-block p {
  display: flex;
  align-items: center;
  margin: 5px 0;
}

.global-icon {
  margin-right: 10px;
  font-size: 3rem;
  color: rgb(0, 255, 251);
}

.local-data-value,
.global-data-value {
  color: rgb(255, 255, 255);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  background: rgb(120, 117, 117);
  border: 1px solid rgb(255, 255, 255);
  border-radius: 0.8rem;
}
</style>