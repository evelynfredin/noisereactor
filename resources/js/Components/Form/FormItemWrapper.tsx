import React, { PropsWithChildren } from 'react';

const FormItemWrapper = ({ children }: PropsWithChildren<unknown>) => {
  return <div className="flex flex-col space-y-2 mb-5">{children}</div>;
};

export default FormItemWrapper;
