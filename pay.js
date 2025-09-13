  window.addEventListener("DOMContentLoaded", () => {
    const hash = window.location.hash.substring(1); // remove the "#"

    if (hash) {
      const button = document.getElementById(hash);
      if (button) {
        button.click(); // Trigger the tab logic
      }
    }
  });

  document.querySelectorAll(".tab-btn").forEach((btn) => {
  btn.addEventListener("click", () => {
    const tabs = document.querySelectorAll(".tab-panel");
    const tabId = btn.getAttribute("aria-controls");

    // Update active button
    document.querySelectorAll(".tab-btn").forEach((b) => {
      b.setAttribute("aria-selected", "false");
    });
    btn.setAttribute("aria-selected", "true");

    // Show correct panel
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });

    const activePanel = document.getElementById(tabId);
    if (activePanel) {
      activePanel.classList.add("active");
    }
  });
});

