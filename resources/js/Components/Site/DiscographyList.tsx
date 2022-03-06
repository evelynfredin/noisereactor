import { Link } from '@inertiajs/inertia-react';
import React from 'react';

type Props = {
  pathToAlbum: number;
  albumTitle: string;
  cover?: string;
};

const DiscographyList = ({ pathToAlbum, albumTitle, cover }: Props) => {
  return (
    <div className="border-b last:border-0">
      <Link href={`/album/${pathToAlbum}`}>
        <div className="smoothify flex h-auto items-center py-3 hover:text-blue-500 transform hover:translate-x-4">
          {cover ? (
            <img
              className="w-6 h-6 rounded-full mr-2"
              src={`/storage/${cover}`}
              alt={`Covert art for ${albumTitle}`}
              width="24px"
              height="24px"
            />
          ) : (
            <img
              className="w-6 h-6 rounded-full mr-2"
              src="/images/album-default.jpg"
              alt="No album cover found"
              width="24px"
              height="24px"
            />
          )}
          {albumTitle}
        </div>
      </Link>
    </div>
  );
};

export default DiscographyList;
