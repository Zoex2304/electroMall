export function sidebarAppear() {
  const sidebarWidth = document.getElementById('placeholder-sidebar');
  const humberger = document.getElementById('humberger')
  const sidebarStatus = localStorage.getItem('sidebar-status');

  if(sidebarStatus === 'expanded'){
    sidebarWidth.classList.remove('sidebar-collapsed')
    sidebarWidth.classList.add('sidebar-expanded')
  }else{
    sidebarWidth.classList.add('sidebar-collapsed')
    sidebarWidth.classList.remove('sidebar-expanded')
  }

  humberger.addEventListener('click', () => {
    sidebarWidth.classList.toggle('sidebar-collapsed');
    sidebarWidth.classList.toggle('sidebar-expanded');

    if(sidebarWidth.classList.contains('sidebar-expanded')){
      localStorage.setItem('sidebar-status','expanded')
    }else{
      localStorage.setItem('sidebar-status','collapsed')
    }
  });
}