type NavItem = {
  id: number;
  label: string;
  path: string;
};

export const navItems: NavItem[] = [
  { id: 1, label: 'Home', path: '/' },
  { id: 2, label: 'Reviews', path: '/reviews' },
  { id: 3, label: 'Albums', path: '/albums' },
  { id: 4, label: 'Artists', path: '/artists' },
];
