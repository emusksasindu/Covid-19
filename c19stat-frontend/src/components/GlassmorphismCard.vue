<template>
    <div class="glassmorphism-card">
      <div class="glassmorphism-icon icon-custom-color">
        <i :class="icon"></i>
      </div>
      <h1 class="glassmorphism-topic">{{ topic }}</h1>
      <div class="glassmorphism-text-container">
        <p class="glassmorphism-text">{{ text1 }}</p>
        <p class="glassmorphism-text">{{ text2 }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'GlassmorphismCard',
    props: {
      icon: String,
      topic: String,
      text1: String,
      text2: String,
    },
  };
  </script>
  
  <style scoped>
  /* Define color variables */
  :root {
    --primary-color: #4a4a4a;
    --background-color: #f8f8f8;
    --glass-background-color: rgba(255, 255, 255, 0.9);
    --text-color: #000000;
    --icon-color: #ffaa00;
  }
  
  .glassmorphism-card {
    position: relative;
    width: 300px;
    ;
    background-color: var(--background-color);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    overflow: visible;
  }
  
  .glassmorphism-icon {
    font-size: 2.8rem;
  position: absolute;
  top: -50px;
  left: 50%; /* Center the icon horizontally */
  transform: translateX(-50%);
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100px;
  height: 100px;
  background-color: #ffffff;
  border-radius: 50%;
  color: var(--icon-color);
  box-shadow: 1px 4px 8px 1px rgba(0, 0, 0, 0.1);
  overflow: visible; /* Add this line to show the whole icon */
  z-index: 1; /* Add this line to ensure the icon is above other elements */
  border: 2px solid white;
  
}
.glassmorphism-card .icon-custom-color {
  color: var(--icon-color);
}


  
  .glassmorphism-topic {
    margin-top: 60px;
    padding: 0 16px;
    text-align: center;
    color: var(--primary-color);
    font-size: 1.8rem;
  }
  
  .glassmorphism-text-container {
    display: flex;
    flex-direction: column;
    align-items: right;
    margin-top: 2.4rem;
    margin-bottom: 2.4rem;
    padding: 0 16px;
  }
  
  .glassmorphism-text {
    margin-bottom: 0.2rem;
    color: var(--text-color);
    text-align: left;
    font-size: 1.4rem;
  }
  </style>
  