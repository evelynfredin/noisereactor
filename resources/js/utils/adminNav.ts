type AdminNavItem = {
  id: number;
  label: string;
  path: string;
};

export const itemList: AdminNavItem[] = [
  { id: 1, label: 'Dashboard', path: '/admin' },
  { id: 2, label: 'Artists', path: '/admin/artists' },
  { id: 3, label: 'Albums', path: '/admin/albums' },
  { id: 4, label: 'Labels', path: '/admin/labels' },
  { id: 5, label: 'Genres', path: '/admin/genres' },
];
