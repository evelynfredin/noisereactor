import { Link } from '@inertiajs/inertia-react';
import React from 'react';
import Chevron from '../Global/Chevron';

type Props = {
  albumPath: number;
  artistName: string;
  albumTitle: string;
  cover?: string;
  release: string;
};

const AlbumCard = ({
  albumPath,
  artistName,
  albumTitle,
  cover,
  release,
}: Props) => {
  return (
    <div className="flex flex-col p-4 rounded-lg transform lg:hover:scale-105 lg:hover:shadow-lg smoothify">
      <Link href={`/album/${albumPath}`}>
        <div className="flex relative">
          <div className="album-tr absolute top-0 flex h-auto w-auto flex-col items-baseline justify-center">
            <p>{artistName}</p>
            <p className="-mt-2 text-right font-semibold uppercase">
              {albumTitle}
              <span>
                <Chevron size="small" />
              </span>
            </p>
          </div>
          <div>
            {cover ? (
              <img
                className="pl-[16%]"
                src={`/storage/${cover}`}
                alt={`Album cover for ${albumTitle}`}
                width="477px"
                height="477px"
              />
            ) : (
              <img
                className="pl-[16%]"
                src="/images/album-default.jpg"
                alt="No cover found for this album"
                width="477px"
                height="477px"
              />
            )}
          </div>
        </div>
        <div className="mt-2 text-right text-xs">{release}</div>
      </Link>
    </div>
  );
};

export default AlbumCard;
