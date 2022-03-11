type AdminNavItem = {
  id: number;
  label: string;
  path: string;
};

export const itemList: AdminNavItem[] = [
  { id: 1, label: 'Dashboard', path: '/' },
  { id: 2, label: 'Artists', path: '/artists' },
  { id: 3, label: 'Albums', path: '/albums' },
  { id: 4, label: 'Labels', path: '/labels' },
  { id: 5, label: 'Genres', path: '/genres' },
];
