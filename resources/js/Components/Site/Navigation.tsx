import React, { PropsWithChildren } from 'react';
import { LinkButton } from '@/Components/Global/Button';
import clsx from 'clsx';
import { Link, usePage } from '@inertiajs/inertia-react';
import { navItems } from '@/utils/nav';

type Props = {
  onMenuClick: () => void;
};

const MainNavItem = ({
  url,
  label,
  match = url,
  exactUrlMatch = false,
}: PropsWithChildren<{
  url: string;
  label: string;
  exactUrlMatch?: boolean;
  match?: string | string[];
}>) => {
  const { url: currentUrl } = usePage();

  const hasUrlMatch = Array.isArray(match)
    ? match.some((m) => currentUrl.startsWith(m))
    : currentUrl.startsWith(match);

  const linkActive =
    (exactUrlMatch && currentUrl === match) || (!exactUrlMatch && hasUrlMatch);

  return (
    <Link
      href={url}
      className={clsx(
        'text-lg w-full h-full',
        'focus:bg-blue-500 focus:text-white'
      )}
    >
      <li
        className={clsx(
          'group py-2 px-3 font-headings transition delay-150 duration-300 ease-in-out md:py-0 group flex h-full items-center ',
          'hover:bg-blue-500 hover:text-white',
          linkActive && 'bg-blue-500 text-white'
        )}
      >
        {label}
      </li>
    </Link>
  );
};

const Navigation = ({ onMenuClick }: Props) => {
  return (
    <div className="mt-5 h-full font-bold md:mt-0">
      <ul className="flex items-start md:items-center h-12 flex-col md:flex-row md:space-x-3">
        {navItems.map((item) => (
          <MainNavItem
            key={item.id}
            url={item.path}
            label={item.label}
            exactUrlMatch={item.label === 'Home'}
          />
        ))}
        <div className="mt-5 md:mt-0 w-full">
          <LinkButton small onChange={onMenuClick} href="/login">
            Login
          </LinkButton>
        </div>
      </ul>
    </div>
  );
};
export default Navigation;
