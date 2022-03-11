import { InertiaLink } from '@inertiajs/inertia-react';
import clsx from 'clsx';
import React, { ComponentPropsWithoutRef, PropsWithChildren } from 'react';

type Props = {
  data: Laravel.Pagination<unknown>;
};

export const Pagination = ({ data }: Props) => {
  if (data.meta.last_page === 1) {
    return null;
  }

  return (
    <nav aria-label="Paginated navigation" className="">
      <div className="flex flex-col md:flex-row justify-center items-center gap-2">
        <div className="space-x-2 my-1 md:my-0">
          {data.links.first && data.meta.current_page !== 1 ? (
            <Link aria-label="Go to first page" href={data.links.first}>
              First
            </Link>
          ) : (
            <CurrentItem aria-current="page" aria-label="You're on page 1">
              First
            </CurrentItem>
          )}
        </div>

        <div className="space-x-2 my-1 md:my-0">
          {data.meta.links.map((link, index) =>
            link.url ? (
              <Link
                key={index}
                active={link.active}
                href={link.url}
                aria-label={`Go to page ${link.label}`}
                aria-current={link.active ? 'page' : undefined}
              >
                {link.label}
              </Link>
            ) : (
              <CurrentItem key={index}>{link.label}</CurrentItem>
            )
          )}
        </div>

        <div className="space-x-2 my-1 md:my-0">
          {data.links.last && data.meta.current_page !== data.meta.last_page ? (
            <Link aria-label="Go to last page" href={data.links.last}>
              Last
            </Link>
          ) : (
            <CurrentItem
              aria-current="page"
              aria-label={`Currrent page, page ${data.meta.last_page}`}
            >
              Last
            </CurrentItem>
          )}
        </div>
      </div>
    </nav>
  );
};

const Link = ({
  active,
  ...rest
}: PropsWithChildren<
  ComponentPropsWithoutRef<typeof InertiaLink> & { active?: boolean }
>) => (
  <InertiaLink
    className={clsx(
      'rounded-full px-3 py-1 outline-none hover:bg-blue-200 hover:text-gray-600 focus:ring focus:ring-primary-900 focus:ring-offset-2',
      active ? 'bg-blue-500 text-white' : 'bg-blue-300'
    )}
    {...rest}
  />
);

const CurrentItem = (props: PropsWithChildren<{}>) => (
  <span
    aria-disabled="true"
    className="rounded-full bg-blue-300 px-3 py-1"
    {...props}
  />
);
