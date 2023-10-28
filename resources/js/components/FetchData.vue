
    <div>
        <select class="select select-bordered w-full max-w-xs" v-model="selected_zone">
          <option value="vulnerability-mapping-zone-a?form_ref=804338bd69954d8fa0e0fa988f754061_652f17f87e715">Zone A</option>
          <option value="vulnerability-mapping-zone-b?form_ref=f46755626b5a4c28bf190b337f6e9930_652f17f87e715">Zone B</option>
          <option value="vulnerability-mapping-zone-c?form_ref=f46755626b5a4c28bf190b337f6e9930_652f17f87e715">Zone C</option>
        </select>
        <button @click="fetchData">Fetch Data</button>
        {{ selected_zone }}
      </div>
  

  
  <script>
  export default {
    data() {
      return {
        selected_zone: '',
      };
    },
    methods: {
      async fetchData() {
        try {
          let page = 1;
          let perPage = 1000;
          let lastPage = false;
  
          while (!lastPage) {
            const response = await this.fetchDataFromApi(page, perPage);
  
            if (response.data.entries.length === 0) {
              // No more data, exit the loop
              lastPage = true;
            } else {
              // Send the data to your Laravel endpoint for storage
              this.sendDataToLaravel(response.data.entries);
  
              // Move to the next page
              page++;
            }
          }
        } catch (error) {
          console.error(error);
        }
      },
  
      async fetchDataFromApi(page, perPage) {
        const apiUrl = `https://five.epicollect.net/api/export/entries/${this.selected_zone}&page=${page}&per_page=${perPage}`;
        return await this.$axios.get(apiUrl);
      },
  
      async sendDataToLaravel(data) {
        try {
          // Use Axios or another HTTP library to send data to your Laravel endpoint
          await this.$axios.post('/api/save-data', { entries: data });
        } catch (error) {
          console.error('Error sending data to Laravel:', error);
        }
      },
    },
  };
  </script>
  