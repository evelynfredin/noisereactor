import { Link } from '@inertiajs/inertia-react';
import React, { PropsWithChildren } from 'react';

type Props = {
  slug: string;
  name: string;
  albums_count: number;
};

const ArtistName = ({ artistName }) => {
  return (
    <div className="bg-white text-secondary-200 rounded-full py-1 px-2 absolute bottom-0 right-0 m-2 mt-2 focus:outline-1">
      <span className="text-sm md:text-base capitalize">{artistName}</span>
    </div>
  );
};

const MusicCount = ({ count }) => {
  return (
    <div className="bg-white text-secondary-200 text-xs font-bold rounded-full py-1 px-2 absolute top-0 m-2 mt-2">
      <svg
        className="w-4 inline-block"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeWidth="2"
          d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"
        ></path>
      </svg>
      <span>{count}</span>
    </div>
  );
};

const ArtistCard = ({
  slug,
  name,
  albums_count,
  children,
}: PropsWithChildren<Props>) => {
  return (
    <div className="bg-white rounded overflow-hidden shadow-sm border relative hover:shadow-lg">
      <Link href={`/artist/${slug}`}>
        {children}
        <ArtistName artistName={name} />
        <MusicCount count={albums_count} />
      </Link>
    </div>
  );
};

export default ArtistCard;
