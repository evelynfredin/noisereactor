import LabelCard from '@/Components/Admin/LabelCard';
import Admin from '@/Layouts/Admin';
import React from 'react';

type Props = {
  labels: App.Label[];
};

const Labels = ({ labels }: Props) => {
  return (
    <Admin title="Labels">
      <div className="overflow-x-auto grid grid-cols-2 lg:grid-cols-3 gap-5 py-10">
        {labels.map((label) => (
          <LabelCard
            key={label.id}
            labelName={label.name}
            labelCount={label.albums_count}
          />
        ))}
      </div>
    </Admin>
  );
};

export default Labels;
