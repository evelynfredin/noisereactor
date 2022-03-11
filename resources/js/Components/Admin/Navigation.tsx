import React, { PropsWithChildren } from 'react';
import { LinkButton } from '@/Components/Global/Button';
import clsx from 'clsx';
import { Link, usePage } from '@inertiajs/inertia-react';
import { itemList } from '@/utils/adminNav';

type Props = {
  onMenuClick?: () => void;
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
        'lg:text-lg w-full h-full md:w-auto lg:w-full',
        'focus:bg-blue-500 focus:text-white'
      )}
    >
      <li
        className={clsx(
          'group p-3 text-gray-400 font-headings transition delay-150 duration-300 ease-in-out flex h-full items-center justify-center rounded-full',
          'hover:bg-blue-500 hover:text-white',
          linkActive && 'bg-blue-500 text-gray-50'
        )}
      >
        {label}
      </li>
    </Link>
  );
};

const Navigation = () => {
  return (
    <div className="uppercase px-3 font-bold mt-5">
      <ul className="flex items-center flex-col space-y-3">
        {itemList.map((item) => (
          <MainNavItem
            key={item.id}
            url={item.path}
            label={item.label}
            exactUrlMatch={item.label === 'Home'}
          />
        ))}
      </ul>
    </div>
  );
};
export default Navigation;
