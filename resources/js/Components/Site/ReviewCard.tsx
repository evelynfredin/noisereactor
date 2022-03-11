import { Link } from '@inertiajs/inertia-react';
import React from 'react';
import Chevron from '../Global/Chevron';

type Props = {
  createdAt: string;
  albumTitle: string;
  artistName: string;
  excerpt: string;
  pathToAlbum: number;
};

const ReviewCard = ({
  createdAt,
  albumTitle,
  artistName,
  excerpt,
  pathToAlbum,
}: Props) => {
  return (
    <div className="group bg-white rounded-lg shadow-sm flex flex-col">
      <Link href={`/album/${pathToAlbum}#review`} className="flex flex-grow">
        <div className="bg-gray-200 smoothify group-hover:bg-blue-500 flex flex-col justify-end py-2 rounded-tl-md rounded-bl-md h-full text-gray-100">
          <p>
            <Chevron size="small" />
          </p>
        </div>
        <div className="p-5">
          <p className="text-gray-500 uppercase smoothify text-xs mb-3">
            {createdAt}
          </p>
          <h2 className="text-3xl group-hover:text-blue-500">{albumTitle}</h2>
          <h3 className="mb-5 font-normal">{artistName}</h3>
          <p>{excerpt}</p>
        </div>
      </Link>
    </div>
  );
};

export default ReviewCard;
